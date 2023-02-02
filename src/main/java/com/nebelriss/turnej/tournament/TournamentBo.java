package com.nebelriss.turnej.tournament;

import java.util.UUID;

public class TournamentBo {

    public final UUID id;
    public final String name;
    public final String location;

    public TournamentBo(UUID id, String name, String location) {
        this.id = id;
        this.name = name;
        this.location = location;
    }
}
