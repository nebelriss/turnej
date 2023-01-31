package com.nebelriss.turnej.models;

import jakarta.persistence.*;

import java.io.Serializable;
import java.util.UUID;

@Entity
public class Team implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.UUID)
    @Column(name = "id", nullable = false)
    private UUID id;
}
