package com.nebelriss.turnej.turnej;

import com.nebelriss.api.TurnejApi;
import com.nebelriss.model.TurnejFetchResultData;
import com.nebelriss.turnej.mappers.TurnejFetchResultMapper;
import com.nebelriss.turnej.tournament.TournamentService;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class TurnejController implements TurnejApi {

    private final TournamentService tournamentService;

    public TurnejController(TournamentService tournamentService) {
        this.tournamentService = tournamentService;
    }

    @Override
    public ResponseEntity<TurnejFetchResultData> getTurnejFetchResult() {
        TurnejFetchResultBo bo = new TurnejFetchResultBo(
                tournamentService.getAllTournaments()
        );
        return new ResponseEntity<>(TurnejFetchResultMapper.INSTANCE.toData(bo), HttpStatus.OK);
    }
}
