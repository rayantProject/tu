function testerCobinaison(combiCache, combiSaisie, nbPions) {
    if (combiCache === void 0) { combiCache = []; }
    if (combiSaisie === void 0) { combiSaisie = []; }
    var nbPionsPlaces = 0,
        nbPionsMalPlaces = 0;
    for (var i = 0; i < nbPions; i++) {
        if (combiSaisie[i] == combiCache[i]) {
            nbPionsPlaces++;
        }
    }
    for (var j = 0; j < nbPions; j++) {
        for (var i = 0; i < nbPions; i++) {
            if ((combiSaisie[j] == combiCache[i]) && (i != j)) {
                nbPionsMalPlaces++;
            }
        }
    }
    console.log("bien plac\u00E9 : " + nbPionsPlaces);
    console.log("bien mal plac\u00E9 : " + nbPionsMalPlaces);
}
var combi_cache = [1, 7, 3, 5],
    combi_saisie = [1, 3, 5, 2];
testerCobinaison(combi_cache, combi_saisie, 4);