const { app, BrowserWindow, globalShortcut, clipboard, ipcMain } = require('electron');
const path = require('path');
const Store = require('electron-store');
const store = new Store();

let mainWindow;

function createWindow() {
    mainWindow = new BrowserWindow({
        width: 800,
        height: 600,
        webPreferences: {
            nodeIntegration: true,
            contextIsolation: true,
            preload: path.join(__dirname, 'preload.js')
        },
        // Скрываем стандартную рамку окна для более нативного вида
        frame: false,
        // Делаем окно всегда поверх остальных
        alwaysOnTop: true
    });

    mainWindow.loadFile(path.join(__dirname, 'renderer', 'index.html'));
    
    // По умолчанию скрываем окно
    mainWindow.hide();
}

// Регистрация глобальных горячих клавиш
function registerShortcuts() {
    // Показать/скрыть окно
    globalShortcut.register('CommandOrControl+Shift+T', () => {
        if (mainWindow.isVisible()) {
            mainWindow.hide();
        } else {
            mainWindow.show();
        }
    });

    // Перевести текст из буфера обмена
    globalShortcut.register('CommandOrControl+Shift+V', () => {
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

// Обработка перевода
ipcMain.handle('translate-text', async (event, { text, fromLang, toLang }) => {
    try {
        const response = await axios.post('https://api-free.deepl.com/v2/translate', 
            new URLSearchParams({
                auth_key: process.env.DEEPL_API_KEY,
                text: text,
                source_lang: fromLang,
                target_lang: toLang
            }), {
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }
            });
        return response.data.translations[0].text;
    } catch (error) {
        console.error('Translation error:', error);
        throw error;
    }
});

// Сохраняем окно активным при закрытии macOS
app.on('window-all-closed', () => {
    if (process.platform !== 'darwin') {
        app.quit();
    }
});