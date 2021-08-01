# WarsztatUManka

Docelowo apka FullStackowa

Dane do logowania (oczywiście po odpaleniu seederów) :
Admin
admin@admin.pl
admin@admin

Może dodawać nowe terminy wizyt
Może dodawać swoje auta
Może rezerwować i anulować terminy dla swoich aut

Maniek
maniek@maniek.pl
maniekmaniek

Może dodawać swoje auta
Może rezerwować i anulować terminy dla swoich aut

Reszta intuicyjna


****API*****************************************************

****LISTA AUT****

GET .../api/cars

Zwrócona lista samochodów dodanych do systemu:
 {
        "id": 1,
        "carPlateNumber": "niedostępny",
        "brand": "",
        "modell": "",
        "yearOfProduction": 0,
        "created_by": 1,
        "created_at": null,
        "updated_at": null
    },
    {
        "id": 2,
        "carPlateNumber": "dostępny",
        "brand": "",
        "modell": "",
        "yearOfProduction": 0,
        "created_by": 1,
        "created_at": null,
        "updated_at": null
    }


****DODAWANIE AUTA****    
 POST .../api/cars

Format danych do zapisu w DB    
    {
"carPlateNumber": "EOP RAV4",
"brand": "Toyota",
"modell": "RAV 4",
"yearOfProduction": 2021,
"created_by": 1
}


****EDYCJA DANYCH AUTA****
PUT   /api/cars/{id}

Format danych do zapisu w DB    
    {
"carPlateNumber": "EOP RAV4",
"brand": "Toyota",
"modell": "RAV 4",
"yearOfProduction": 2021,
"created_by": 1
}


****KASOWANIE AUTA****
DELETE   /api/cars/{id}

Nalezy wskazać punkt kasacji :-)


****LISTA WSZYSTKICH WIZYT****
GET   /api/visits


{
        "id": 1,
        "date": "2121-06-15",
        "time": "10:15:00",
        "user_id": 0,
        "car_id": 2,
        "comments": "",
        "created_at": null,
        "updated_at": "2021-07-30T10:30:53.000000Z"
    },
    {
        "id": 2,
        "date": "2121-06-16",
        "time": "10:15:00",
        "user_id": 3,
        "car_id": 6,
        "comments": "",
        "created_at": null,
        "updated_at": "2021-07-30T10:31:51.000000Z"
    },
    {
        "id": 3,
        "date": "2121-06-16",
        "time": "11:15:00",
        "user_id": 0,
        "car_id": 2,
        "comments": "...",
        "created_at": null,
        "updated_at": "2021-07-30T21:21:59.000000Z"
    },
    {
        "id": 4,
        "date": "2021-08-15",
        "time": "09:00:00",
        "user_id": 0,
        "car_id": 2,
        "comments": "...",
        "created_at": "2021-07-30T21:46:39.000000Z",
        "updated_at": "2021-07-30T21:46:39.000000Z"
    },



****REZERWACJA TERMINU car_id > 2 ****

PUT   /api/visits/{id}

{
"user_id": "2",
"car_id": "3",
"comments": "Uwagi"
}


****ANULOWANIE REZERWACJI car_id = 1 -> termin niedostępny  car_id = 2 -> termin dostępny ****

PUT   /api/visits/{id}
{
"user_id": "0",
"car_id": "2",
"comments": "..."
}


****DODAWANIE TERMINU****

POST   /api/calendar

{
"date": "2021-08-15",
"time": "10:00",
"user_id": "0",
"car_id": "2",
"comments": "..."
}



****USUWANIE TERMINU****

DELETE   /api/calendar/{id}
