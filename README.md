# Rijkshuisstijl in Elgg
Deze plugin implementeert een responsief Rijkshuisstijl thema in Elgg. Het thema werkt op Elgg 1.8.

## Ontwikkelomgeving
Zorg ervoor dat je [Node.js](https://nodejs.org/en/download/) hebt geinstalleerd, dat kan bijvoorbeeld op OSX met:

    brew install node

of op Ubuntu Linux met

    apt-get install nodejs

Installeer daarna Webpack globaal met

    npm install -g webpack

Daarna kun je de dependencies installeren door het volgende commando in de map van de plugin aan te roepen

    npm install

Bouw vervolgens de CSS en de JS met het commando

    webpack

Dit commando haalt de bron uit [src/](src/) en bouwt een nieuwe versie in de map [assets/](assets/). Gebruik het commando

    webpack --watch

om een nieuwe versie te bouwen wanneer er wijzigingen zijn.