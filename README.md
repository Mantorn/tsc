## Zadanie
- [x] 1. Załóż domenę na której uruchomisz swój projekt w PHP
- [x] 2. Korzystaj z GIT lub podobnego systemu kontroli wersji przy wysyłaniu na serwer
- [x] 3. Załóż dowolny framework PHP (mile widziany Laravel)
- [x] 4. Utwórz logowanie
- [x] 5. Stwórz połączenie z bazą danych
- [x] 6. Zaimportuj załączony plik do bazy danych i opisz w jaki sposób to zrobiłeś
- [ ] 7. Na podstawie danych z bazy danych zrób wyszukanie produktu na podstawie nazwy produktu i producenta
- [ ] 8. Na wyszukanym produkcie zrób zaokrąglenie do jednostki zakupu przyjmując że na 1 palecie mieści się maksymalnie 80 rolek,  7 kartonów, 200 metrów bieżących, 150 M2 i 400 sztuk. Inne jednostki traktujemy jako sztuki. 1 paleta = 2 paczki Gdy nie ma minima to można brać na pojedyncze jednostki.

### Rozwiązanie do punktu 6
Stworzyłem formularz oraz kontroler do wgrywania plików csv. W tym projekcie wykożystanie jest jednorazowe, ale patrząc przyszłościowo taka funkcja na pewno się przyda.
Kod jest prosty i na pewno można dodać walidację pliku, albo sprawdzanie kolejności i występowanie nagłówków. 

## Notatki
- W pliku z przedmiotami jest kolumna która ewidentnie rozróżnia przedmioty na podstawie relacji z inną nieznaną mi tabelą. Wstępnie po prostu zapisałem te ID, ale prawdobodonie najlepiej byłoby utworzyć oddzielną tabelę z unikalnymi przedmiotami oraz listę zamówień do sprawdzania stanu magazynowego w której było by odwołanie do konkretnych przedmiotów. W zadaniu nie było o tym nic napisane, więc tego nie zrobiłem.
- Zakładam, że strona powinna działać na zdecydowanie większej ilości rekordów