Author: `DrLenux`

License: `MIT`

Allow method:

```php
interface ZodiacSigns {
    function getListZodiacs(string $language): array;
    function addVocabulary(string $language, array $data): void;
    function function get(int $day, int $month, string $language = 'US-en'): ?string; 
}
```

Example:

```php
echo ZodiacSigns::get(21, 6); //return "Gemini"
echo ZodiacSigns::get(23, 7, 'RU-ru'); //return "Лев"
```

Allowed language:
-

- US-en
- RU-ru