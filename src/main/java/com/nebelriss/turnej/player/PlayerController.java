package com.nebelriss.turnej.player;

import com.nebelriss.api.PlayersApi;
import com.nebelriss.model.PlayersResponseData;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class PlayerController implements PlayersApi {

    @Override
    public ResponseEntity<PlayersResponseData> getPlayers() {
        return ResponseEntity.ok(new PlayersResponseData());
    }

}
