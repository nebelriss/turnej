package com.nebelriss.turnej.models;

import jakarta.persistence.*;

import java.io.Serializable;
import java.util.Set;
import java.util.UUID;

@Entity
@Table(name = "teams")
public class Team implements Serializable {

    @Id
    @GeneratedValue(strategy = GenerationType.UUID)
    @Column(name = "id", nullable = false)
    private UUID id;

    @ManyToMany
    @JoinTable(name = "teams_players",
            joinColumns = {
                    @JoinColumn(name = "team_id", referencedColumnName = "id", nullable = false)
            },
            inverseJoinColumns = {
                    @JoinColumn(name = "player_id", referencedColumnName = "id", nullable = false)
            }
    )
    private Set<Player> players;

    @OneToMany(mappedBy = "homeTeam")
    private Set<Match> homeMatches;

    @OneToMany(mappedBy = "awayTeam")
    private Set<Match> awayMatches;
}
