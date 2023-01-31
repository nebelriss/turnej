package com.nebelriss.turnej.models;

import jakarta.persistence.*;

import java.util.Set;
import java.util.UUID;

@Entity
public class Player {
    @Id
    @GeneratedValue(strategy = GenerationType.UUID)
    @Column(name = "id", nullable = false)
    private UUID id;

    private String name;

    @ManyToMany(mappedBy = "players")
    private Set<Team> teams;
}
