const { contextBridge, ipcRenderer } = require('electron');
const { version } = require('../package.json');

contextBridge.exposeInMainWorld('api', {
    translate: (params) => ipcRenderer.invoke('translate-text', params),
    onTranslateClipboard: (callback) => {
        ipcRenderer.on('translate-clipboard', (event, text) => callback(text));
    },
    getTokenInfo: () => ipcRenderer.invoke('get-token-info'),
    getUsageInfo: () => ipcRenderer.invoke('get-usage-info'),
    getAppVersion: () => version
});
