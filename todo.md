172.16.3.14
172.16.3.17
172.16.3.44
172.16.3.8
172.16.2.101

->Base de données [Mandresy] (ok)
    -Creation des Tables
        ->TableYear (ok)
            -id
            -val
        ->TableMonth (ok)
            -id
            -val
            -idYear
        ->TableDay (ok)
            -id
            -jour
            -idMonth
        ->Binome (ok)
            -id
            -idLivreur
            -idVehicule
        ->Livraison (ok)
            -id
            -idJour
            -idBinome
            -idZone
            -idColis
            -depVoiture => A saisir par livraison
            -prix => Equivalence par poids
        ->Carburant (ok)
            -id
            -val
            -prix
        ->Vehicules (ok)
            -id
            -matricule
            -carburant
        ->Livreurs (ok)
            -id
            -nom
        ->Entrepots (ok)
            -id
            -val
        ->Destination (ok)
            -id
            -val
        ->ZonesLivraisons (ok)
            -id
            -idEntrepots
            -idDestination
            -distance
        ->StatusLivraison (ok)
            -id
            -idLivraison
            -idStatus
            -debut
            -fin (NULL SI FINI)
        ->Colis (ok)
            -id
            -val
            -img
            -poids
        ->Equivalence (ok)
            -id
            -pMin
            -pMax
            -prix
        ->Status (ok)
            -id
            -val
        ->TableDepense
            -id
            -salChauffeur
            -depCarburant
            -depEntretien
        ->RapportLivraison
            -id
            -idLivraison    
            -idDepense 
            -recette
-> Modelisation base [Mandresy]
    -Creation des classes
        ->Carburant (ok)
            ::Attributs (ok)
                -$id
                -$val
                -$prix
            ::Methodes (ok)
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Livreur
            ::Attributs
                -$id
                -$nom
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Vehicule
            ::Attributs
                -$id
                -$matricule
                -$idCarburant
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->TableYear
            ::Attributs
                -$id
                -$val
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->TableMonth
            ::Attributs
                -$id
                -$val
                -$idYear
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->TableDay
            ::Attributs
                -$id
                -$jour
                -$idMonth
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Binome
            ::Attributs
                -$id
                -$idLivreur
                -$idVehicule
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Entrepot
            ::Attributs
                -$id
                -$addresse
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Destination
            ::Attributs
                -$id
                -$addresse
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->ZoneLivraison
            ::Attributs
                -$id
                -$idEntrepot
                -$idDestination
                -$distance
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Statut
            ::Attributs
                -$id
                -$val
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->TableDepense
            ::Attributs
                -$id
                -$salChauffeur
                -$depCarburant
                -$depEntretien
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->RapportLivraison
            ::Attributs
                -$id
                -$idLivraison
                -$idDepense
                -$recette
                -$difference
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Livraison
            ::Attributs
                -$id
                -$idBinome
                -$idDay
                -$idZone
                -$idColis
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->StatutLivraison
            ::Attributs
                -$id
                -$idLivraison
                -$idStatut
                -$debut
                -$fin
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Colis
            ::Attributs
                -$id
                -$val
                -$img
                -$poids
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
        ->Equivalence
            ::Attributs
                -$id
                -$pMin
                -$pMax
                -$prix
            ::Methodes
                -setters
                -getters
                -save <=> update
                -getAll
                -delete
                -getById
->Fonctionnalite de base [Alexandre]
    -Primaire
        ->Gestion de livraison
            -Creation livraison {}
            -Statut livraison