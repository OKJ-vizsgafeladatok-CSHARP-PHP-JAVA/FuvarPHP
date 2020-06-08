<?php

class Fuvar {

    private $taxiid;
    private $indulas;
    private $idotartam;
    private $tavolsag;
    private $viteldij;
    private $borravalo;
    private $fizetesmodja;

    function __construct($taxiid, $indulas, $idotartam, $tavolsag, $viteldij, $borravalo, $fizetesmodja) {
        $this->taxiid = $taxiid;
        $this->indulas = $indulas;
        $this->idotartam = $idotartam;
        $this->tavolsag = $tavolsag;
        $this->viteldij = $viteldij;
        $this->borravalo = $borravalo;
        $this->fizetesmodja = $fizetesmodja;
    }

    function getTaxiid() {
        return $this->taxiid;
    }

    function getIndulas() {
        return $this->indulas;
    }

    function getIdotartam() {
        return $this->idotartam;
    }

    function getTavolsag() {
        return $this->tavolsag;
    }

    function getViteldij() {
        return $this->viteldij;
    }

    function getBorravalo() {
        return $this->borravalo;
    }

    function getFizetesmodja() {
        return $this->fizetesmodja;
    }

    function setTaxiid($taxiid): void {
        $this->taxiid = $taxiid;
    }

    function setIndulas($indulas): void {
        $this->indulas = $indulas;
    }

    function setIdotartam($idotartam): void {
        $this->idotartam = $idotartam;
    }

    function setTavolsag($tavolsag): void {
        $this->tavolsag = $tavolsag;
    }

    function setViteldij($viteldij): void {
        $this->viteldij = $viteldij;
    }

    function setBorravalo($borravalo): void {
        $this->borravalo = $borravalo;
    }

    function setFizetesmodja($fizetesmodja): void {
        $this->fizetesmodja = $fizetesmodja;
    }


}
