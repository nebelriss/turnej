package com.nebelriss.turnej.models;

import jakarta.persistence.*;

import java.util.UUID;

@Entity
public class Tournament {
    @Id
    @GeneratedValue(strategy = GenerationType.UUID)
    @Column(name = "id", nullable = false)
    private UUID id;

    @Column(nullable = false)
    private String name;

    @Column(nullable = true)
    private String location;
}
