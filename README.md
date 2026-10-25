# PHP CI/CD Lab

[![PHP CI Application](https://github.com/Ser-Varvara/php-ci-cd-lab/actions/workflows/php-ci.yml/badge.svg?branch=main)](https://github.com/Ser-Varvara/php-ci-cd-lab/actions/workflows/php-ci.yml)

## Опис проєкту

Навчальний PHP-проєкт для вивчення Git, GitHub та автоматизації перевірки програмного коду за допомогою GitHub Actions.

## Функціональні можливості

- Додавання двох чисел.
- Віднімання двох чисел.
- Автоматизоване тестування за допомогою PHPUnit.
- Перевірка форматування коду за допомогою Laravel Pint.
- Автоматичний запуск CI-пайплайну.

## Використані технології

- PHP 8.2
- Git та GitHub
- Composer
- PHPUnit
- Laravel Pint
- GitHub Actions

## Запуск тестів

Для запуску тестів локально необхідно встановити PHP та Composer.

Встановлення залежностей:

```bash
composer install
```

Запуск автоматичних тестів:

```bash
./vendor/bin/phpunit tests/Unit
```

Перевірка форматування коду:

```bash
./vendor/bin/pint --test
```

## CI/CD

Автоматичні перевірки виконуються за допомогою GitHub Actions при створенні Pull Request або відправленні змін до гілки main.

Цей навчальний PHP-проєкт створено для дослідження системи контролю версій Git, платформи GitHub та автоматизації перевірки програмного коду за допомогою GitHub Actions.

## Функціональні можливості

- Реалізація простих математичних операцій мовою PHP.
- Додавання та віднімання двох чисел.
- Автоматизоване тестування функцій за допомогою PHPUnit.
- Перевірка форматування PHP-коду за допомогою Laravel Pint.
- Автоматичний запуск CI-пайплайну через GitHub Actions.

## Технології

- PHP 8.2
- Git та GitHub
- Composer
- PHPUnit
- Laravel Pint
- GitHub Actions

## Мета проєкту

Опанувати практичні навички керування версіями, командної розробки та налаштування автоматизованої перевірки якості програмного коду.
