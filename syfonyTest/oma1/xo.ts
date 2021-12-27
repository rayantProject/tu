function testerCobinaison(combiCache = [], combiSaisie = [], nbPions: number): void {
    let nbPionsPlaces= 0, nbPionsMalPlaces = 0;
    for (let i = 0; i < nbPions; i++) {
        if (combiSaisie[i] == combiCache[i]) {
            nbPionsPlaces++;
        }}


    for (let j = 0; j < nbPions; j++) {
        
        for (let i = 0; i < nbPions; i++) {
            if ((combiSaisie[j] == combiCache[i] ) && (i!=j)) {
                nbPionsMalPlaces++;
            }}
    }
    console.log(`bien placé : ${nbPionsPlaces}`);
    console.log(`bien mal placé : ${nbPionsMalPlaces}`);
}


let combi_cache = [1,7,3,5], combi_saisie = [1,7,5,2];


testerCobinaison(combi_cache, combi_saisie, 4);