package com.nebelriss.turnej.player;

import java.util.UUID;

public class PlayerBo {
    public final UUID id;

    public final String name;

    public PlayerBo(UUID id, String name) {
        this.id = id;
        this.name = name;
    }
}
