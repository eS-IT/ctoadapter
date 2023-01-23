# Ctoadapter


## Beschreibung

Bei dieser Software handelt es sich um eine Erweiterung für das Open Source CMS Contao. Sie fügt Adapter für die Klassen von Contao hinzu.

Die Klassen mit statischen Methoden können in Tests schlecht injiziert werden und eignen sich deshalt nur bedingt für Softwaretests.


## Autor

__e@sy Solutions IT:__ Patrick Froch <info@easySolutionsIT.de>


## Voraussetzungen

- php: ^8.1
- contao/core-bundle: ^4.13


## Installation

Die Erweiterung kann direkt aus der Versionsverwaltugn installiert werden.


## Einrichtung

Die Klassen können einfach per Dependency Injection über den Container bezogen werden. Sie haben den gleichen Namen, wie die Originalklassen.

Der Namespace lautet `Esit\Ctoadapter\Classes\Services\Adapter`.

Die folgenden Klassen stehen zur Verfügung:

- `Config`
- `Controller`
- `Database`
- `Environment`
- `FilesModel`
- `Idna`
- `Input`
- `Message`
- `ModuleModel`
- `PageModel`
- `StringUtil`
- `System`
- `Validator`
