const { contextBridge, ipcRenderer } = require('electron');

contextBridge.exposeInMainWorld('electronAPI', {
    translateText: (params) => ipcRenderer.invoke('translate-text', params),
    onTranslateClipboard: (callback) => 
        ipcRenderer.on('translate-clipboard', (event, value) => callback(value))
});
