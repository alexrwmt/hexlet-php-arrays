let translateTimeout;

document.getElementById('sourceText').addEventListener('input', function(e) {
    clearTimeout(translateTimeout);
    translateTimeout = setTimeout(() => {
        translateText(e.target.value);
    }, 500);
});

document.getElementById('closeBtn').addEventListener('click', () => {
    window.close();
});

// Обработка текста из буфера обмена
window.electronAPI.onTranslateClipboard((text) => {
    document.getElementById('sourceText').value = text;
    translateText(text);
});

async function translateText(text) {
    if (!text) {
        document.getElementById('translatedText').value = '';
        return;
    }

    try {
        const fromLang = document.getElementById('fromLang').value;
        const toLang = document.getElementById('toLang').value;

        const translatedText = await window.electronAPI.translateText({
            text,
            fromLang,
            toLang
        });

        document.getElementById('translatedText').value = translatedText;
    } catch (error) {
        document.getElementById('translatedText').value = 'Translation error occurred';
        console.error('Translation error:', error);
    }
}
