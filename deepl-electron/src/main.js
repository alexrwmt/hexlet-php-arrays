require('dotenv').config();
const { app, BrowserWindow, globalShortcut, clipboard, ipcMain } = require('electron');
const path = require('path');
const axios = require('axios');
const packageJson = require('../package.json');

(async () => {
    const { default: Store } = await import('electron-store');
    const store = new Store();

    // Сохраняем API ключ в store при первом запуске
    if (!store.get('DEEPL_API_KEY')) {
        const apiKey = process.env.DEEPL_API_KEY;
        if (!apiKey) {
            console.error('DEEPL_API_KEY not found in .env file');
            app.quit();
            return;
        }
        store.set('DEEPL_API_KEY', apiKey);
    }

    let mainWindow;

    function createWindow() {
        mainWindow = new BrowserWindow({
            width: 800,
            height: 600,
            title: `Translator v${packageJson.version}`,
            webPreferences: {
                contextIsolation: true,
                enableRemoteModule: false,
                nodeIntegration: false,
                preload: path.join(__dirname, 'preload.js')
            },
            // frame: false,
            alwaysOnTop: true
        });

        mainWindow.loadFile(path.join(__dirname, 'renderer', 'index.html'));
        
        // Скрываем окно после загрузки
        // mainWindow.webContents.on('did-finish-load', () => {
        //     mainWindow.hide();
        // });

        // Скрываем окно при потере фокуса
        // mainWindow.on('blur', () => {
        //     mainWindow.hide();
        // });
    }

    // Регистрация глобальных горячих клавиш
    function registerShortcuts() {
        globalShortcut.register('Super+Alt+T', () => {
            if (mainWindow.isVisible()) {
                mainWindow.hide();
            } else {
                mainWindow.show();
            }
        });

        globalShortcut.register('Super+Alt+V', () => {
            const text = clipboard.readText();
            if (text) {
                mainWindow.show();
                mainWindow.webContents.send('translate-clipboard', text);
            }
        });
    }

    app.whenReady().then(() => {
        createWindow();
        registerShortcuts();
    });

    // Обновляем обработчик перевода
    ipcMain.handle('translate-text', async (event, { text, fromLang, toLang }) => {
        try {
            const response = await axios.post('https://api-free.deepl.com/v2/translate', 
                new URLSearchParams({
                    auth_key: store.get('DEEPL_API_KEY'), // Используем ключ из store
                    text: text,
                    source_lang: fromLang,
                    target_lang: toLang
                }), {
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                });
            
            if (response.data && response.data.translations && response.data.translations[0]) {
                return response.data.translations[0].text;
            } else {
                throw new Error('Invalid response format');
            }
        } catch (error) {
            console.error('Translation error:', error.response?.data || error.message);
            throw new Error('Translation error occurred');
        }
    });

    ipcMain.on('minimize-window', () => {
        mainWindow.minimize();
    });

    ipcMain.on('close-window', () => {
        mainWindow.hide(); // Скрываем окно вместо закрытия
    });

    app.on('window-all-closed', () => {
        if (process.platform !== 'darwin') {
            app.quit();
        }
    });


    ipcMain.handle('get-usage-info', async (event) => {
        const authKey = store.get('DEEPL_API_KEY'); // Получаем API ключ из хранилища
        try {
            const response = await axios.get('https://api-free.deepl.com/v2/usage', {
                headers: {
                    'Authorization': `DeepL-Auth-Key ${authKey}`
                }
            });
            return {
                characterCount: response.data.character_count,
                characterLimit: response.data.character_limit
            };
        } catch (error) {
            console.error('Error fetching usage info:', error);
            throw new Error('Failed to fetch usage info');
        }
    });
})();