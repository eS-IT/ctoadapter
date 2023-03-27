# Ctoadapter


## Beschreibung

Bei dieser Software handelt es sich um eine Erweiterung für das Open Source CMS Contao. Sie fügt Adapter für die
Klassen von Contao hinzu. Die Klassen mit statischen Methoden können in Tests schlecht injiziert werden und eignen
sich deshalt nur bedingt für Softwaretests. Mit dieser Erweiterung können die statischen Methoden als Instanzmethoden
genutzt und somit in Tests besser verwendet werden.


## Autor

__e@sy Solutions IT:__ Patrick Froch <info@easySolutionsIT.de>


## Lizenz

Die Software wird unter LGPL veröffentlicht. Details sind in der Datei `LICENSE` zu finden.


## Voraussetzungen

- php: ~8.0
- contao/core-bundle: ~4.9|^5.1


## Installation

Die Erweiterung kann über den Contao Manager installiert werden. Einfach nach `esit/ctoadapter` suchen und installieren.


## Einrichtung

Die Klassen können einfach per Dependency Injection über den Container bezogen werden. Sie haben den gleichen Namen,
wie die Originalklassen. Mittels `autowiring` können die Klassen automatisch injeziert werden.

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
