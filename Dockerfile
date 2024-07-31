FROM php:8.2-cli
WORKDIR /usr/src/app
COPY . .
# CMD ["php", "src/index.php"]
CMD ["php", "-S", "0.0.0.0:8000", "-t", "src/"]