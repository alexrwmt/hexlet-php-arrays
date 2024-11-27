let translateTimeout;
const loader = document.getElementById('loader');

// Функция перевода
async function translateText() {
    const sourceText = document.getElementById('sourceText').value;
    if (!sourceText.trim()) {
        document.getElementById('translatedText').value = '';
        return;
    }

    const fromLang = document.querySelector('input[name="fromLang"]:checked').value;
    const toLang = document.querySelector('input[name="toLang"]:checked').value;
    
    try {
        // Показываем loader перед запросом
        loader.style.display = 'block';
        
        const translatedText = await window.api.translate({
            text: sourceText,
            fromLang,
            toLang
        });
        document.getElementById('translatedText').value = translatedText;
    } catch (error) {
        document.getElementById('translatedText').value = `Error: ${error.message}`;
        console.error('Translation failed:', error);
    } finally {
        // Скрываем loader после завершения запроса
        loader.style.display = 'none';
    }
}

// Обработчик ввода текста с задержкой
document.getElementById('sourceText').addEventListener('input', (e) => {
    clearTimeout(translateTimeout);
    translateTimeout = setTimeout(() => translateText(), 500);
});

// Обработчик изменения языков
document.querySelectorAll('input[name="fromLang"], input[name="toLang"]').forEach(radio => {
    radio.addEventListener('change', () => {
        if (document.getElementById('sourceText').value.trim()) {
            translateText();
        }
    });
});

// Обработка текста из буфера обмена
window.api.onTranslateClipboard((text) => {
    document.getElementById('sourceText').value = text;
    translateText();
});
