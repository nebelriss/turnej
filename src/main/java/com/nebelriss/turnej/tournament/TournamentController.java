package com.nebelriss.turnej.tournament;

import com.nebelriss.api.TournamentApi;
import com.nebelriss.model.TournamentData;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class TournamentController implements TournamentApi {
    @Override
    public ResponseEntity<TournamentData> addTournament(TournamentData tournamentData) {
        return null;
    }
}
