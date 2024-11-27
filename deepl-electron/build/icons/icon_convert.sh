#!/bin/bash

# Убедитесь, что у вас есть исходный файл icon.png размером 1024x1024
SOURCE_ICON="icon.png"
ICONSET_DIR="icon.iconset"

# Создаем папку .iconset
mkdir -p $ICONSET_DIR

# Генерируем изображения разных размеров
sips -z 16 16     $SOURCE_ICON --out $ICONSET_DIR/icon_16x16.png
sips -z 32 32     $SOURCE_ICON --out $ICONSET_DIR/icon_16x16@2x.png
sips -z 32 32     $SOURCE_ICON --out $ICONSET_DIR/icon_32x32.png
sips -z 64 64     $SOURCE_ICON --out $ICONSET_DIR/icon_32x32@2x.png
sips -z 128 128   $SOURCE_ICON --out $ICONSET_DIR/icon_128x128.png
sips -z 256 256   $SOURCE_ICON --out $ICONSET_DIR/icon_128x128@2x.png
sips -z 256 256   $SOURCE_ICON --out $ICONSET_DIR/icon_256x256.png
sips -z 512 512   $SOURCE_ICON --out $ICONSET_DIR/icon_256x256@2x.png
sips -z 512 512   $SOURCE_ICON --out $ICONSET_DIR/icon_512x512.png
sips -z 1024 1024 $SOURCE_ICON --out $ICONSET_DIR/icon_512x512@2x.png

# Создаем .icns файл
iconutil -c icns $ICONSET_DIR

# Опционально: удаляем временную папку
rm -R $ICONSET_DIR

echo "icon.icns создан успешно."