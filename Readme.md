# Lehrabschlussprüfung – Entwicklung einer Webanwendung

Prüfungsaufgabe Nr. 4

## Aufgabe: Auftragsverwaltung einer Fahrradwerkstatt

6 Stunden

Schwierigkeitsgrad: Mittel

Eine kleine Fahrradwerkstatt führt täglich Reparaturen und Wartungsarbeiten an Fahrrädern durch. Bisher werden die Reparaturaufträge auf Papier erfasst. Dadurch kommt es immer wieder zu Problemen, da Aufträge verloren gehen oder der aktuelle Bearbeitungsstand nicht bekannt ist.

Die Werkstatt möchte deshalb eine Webanwendung, mit der Reparaturaufträge einfach erfasst und verwaltet werden können.

Entwickeln Sie eine Anwendung, die den Mitarbeiterinnen und Mitarbeitern die tägliche Arbeit erleichtert.

## 1. Reparaturaufträge erfassen

Wenn ein Kunde sein Fahrrad zur Reparatur bringt, soll ein neuer Reparaturauftrag angelegt werden können.

Dabei sollen folgende Informationen erfasst werden:

- Name und Telefonnummer des Kunden
- Fahrradmarke und Fahrradmodell
- Beschreibung des Problems
- Datum der Annahme
- voraussichtlicher Fertigstellungstermin
- geschätzte Reparaturkosten

Jeder Reparaturauftrag soll eine eindeutige Auftragsnummer erhalten.

## 2. Auftragsübersicht

Alle Reparaturaufträge sollen in einer übersichtlichen Liste angezeigt werden.

Für jeden Auftrag sollen mindestens die Auftragsnummer, der Kundenname, das Fahrradmodell, das Annahmedatum und der aktuelle Bearbeitungsstatus ersichtlich sein.

Die neuesten Aufträge sollen zuerst angezeigt werden.

## 3. Suche und Filterung

Damit Mitarbeiter bestimmte Reparaturaufträge schnell finden können, soll eine Suchfunktion vorhanden sein.

Es soll möglich sein, nach dem Namen eines Kunden oder einer Auftragsnummer zu suchen.

Zusätzlich sollen Aufträge nach ihrem Bearbeitungsstatus gefiltert werden können.

## 4. Bearbeitungsstatus verwalten

Jeder Reparaturauftrag kann einen der folgenden Zustände besitzen:

- Offen
- In Bearbeitung
- Abgeschlossen
- Abgeholt

Beim Erstellen eines neuen Auftrags soll dieser automatisch den Status „Offen“ erhalten.

Mitarbeiter sollen den Status eines Auftrags nachträglich ändern können.

## 5. Reparaturauftrag bearbeiten

Bereits erfasste Reparaturaufträge sollen bearbeitet werden können.

Beispielsweise kann sich der Fertigstellungstermin ändern oder es können zusätzliche Informationen zur Reparatur ergänzt werden.

Die Auftragsnummer darf dabei nicht verändert werden.

## 6. Reparaturauftrag abschließen

Wenn eine Reparatur abgeschlossen wurde, sollen die tatsächlich angefallenen Reparaturkosten erfasst werden können.

Zusätzlich soll das Datum der Fertigstellung dokumentiert werden.

Ein abgeschlossener Auftrag soll anschließend als „Abgeschlossen“ gekennzeichnet sein.

Wird das Fahrrad vom Kunden abgeholt, soll der Status auf „Abgeholt“ geändert werden können.

## 7. Reparaturauftrag löschen

Irrtümlich angelegte Reparaturaufträge sollen entfernt werden können.

Vor dem endgültigen Löschen muss eine Bestätigung erfolgen, damit Aufträge nicht versehentlich gelöscht werden.

## 8. Allgemeine Anforderungen

Die Anwendung soll folgende Anforderungen erfüllen:

- Übersichtliche und verständliche Bedienung
- Einheitliches Erscheinungsbild
- Gute Nutzbarkeit auf Computern und Smartphones
- Überprüfung der eingegebenen Informationen
- Verständliche Fehlermeldungen bei ungültigen Eingaben
- Bestätigung nach erfolgreichen Aktionen
- Dauerhafte Speicherung der erfassten Informationen
- Verhinderung offensichtlich widersprüchlicher Angaben, beispielsweise negativer Reparaturkosten

Eine Benutzeranmeldung ist nicht erforderlich.

## 9. Abgabe

Geben Sie die vollständige Anwendung sowie alle für die Inbetriebnahme notwendigen Dateien ab.

Falls besondere Schritte zur Einrichtung erforderlich sind, sollen diese kurz dokumentiert werden.

## 10. Bewertung

| Bewertungskriterium                   | Punkte |
| ------------------------------------- | ------ |
| Reparaturaufträge erfassen            | 15     |
| Auftragsübersicht und Detailanzeige   | 15     |
| Suche und Filterung                   | 15     |
| Bearbeitungsstatus verwalten          | 15     |
| Aufträge bearbeiten und löschen       | 15     |
| Reparaturabschluss und Kosten         | 10     |
| Benutzerfreundlichkeit und Gestaltung | 10     |
| Eingabeprüfung und Fehlerbehandlung   | 5      |
| Gesamt                                | 100    |

## 11. Mindestanforderungen für eine positive Beurteilung

Für eine positive Beurteilung müssen mindestens 50 Punkte erreicht werden. Die folgenden Kernfunktionen müssen dabei grundsätzlich funktionieren:

- Neue Reparaturaufträge können erfasst und dauerhaft gespeichert werden.
- Vorhandene Aufträge werden in einer Übersicht angezeigt.
- Aufträge können nachträglich bearbeitet werden.
- Der Bearbeitungsstatus kann geändert werden.
- Reparaturaufträge können gelöscht werden.
- Die wichtigsten Benutzereingaben werden überprüft.

## 12. Optionale Zusatzaufgaben

Diese Aufgaben sollen erst bearbeitet werden, wenn alle Pflichtanforderungen umgesetzt wurden.

1. Kostenübersicht: Anzeige der gesamten Reparaturkosten aller abgeschlossenen Aufträge.
2. Überfällige Aufträge: Reparaturen, deren geplanter Fertigstellungstermin überschritten wurde, sollen besonders gekennzeichnet werden.
3. Reparaturhistorie: Anzeige aller bisherigen Reparaturaufträge eines bestimmten Kunden.
4. Monatsstatistik: Anzeige der Anzahl abgeschlossener Reparaturen pro Monat.
5. Druckansicht: Eine übersichtliche, druckfreundliche Auftragsbestätigung für Kunden.

## 13. Lösungsskizze – nur für die Prüfungskommission

Dieser Abschnitt ist nicht Bestandteil der Aufgabenstellung für die Prüflinge.

Erwartete fachliche Objekte: Reparaturauftrag, Kunde und Fahrrad. Die Umsetzung kann mit einem gemeinsamen Datenbestand für Reparaturaufträge oder mit getrennten, miteinander verknüpften Datenbeständen erfolgen.

Erwartete Funktionen: Erfassung, Auflistung, Suche, Filterung, Detailanzeige, Bearbeitung und Löschung von Aufträgen sowie Statusverwaltung und Dokumentation der Reparaturkosten.

Wichtige Prüffälle: Ungültige Kostenangaben, fehlende Pflichtangaben, nicht vorhandene Auftragsnummern, unveränderliche Auftragsnummern und korrekte Statusänderungen.

Bewertungsspielraum: Die technische Architektur, die Wahl der Datenhaltung und die Organisation der Anwendung bleiben den Prüflingen überlassen. Eine bestimmte Datenbankstruktur oder Anzahl von Seiten ist nicht vorgeschrieben.

Zeitliche Einschätzung: Der Pflichtumfang ist für sechs Stunden ausgelegt. Die Zusatzaufgaben sind nicht für eine vollständige Umsetzung innerhalb der regulären Prüfungszeit vorgesehen.