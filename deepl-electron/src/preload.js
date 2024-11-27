const { contextBridge, ipcRenderer } = require('electron');

contextBridge.exposeInMainWorld('api', {
    translate: (params) => ipcRenderer.invoke('translate-text', params),
    onTranslateClipboard: (callback) => {
        ipcRenderer.on('translate-clipboard', (event, text) => callback(text));
    }
});
