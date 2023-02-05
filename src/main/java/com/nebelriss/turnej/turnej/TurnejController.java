package com.nebelriss.turnej.turnej;

import com.nebelriss.api.TurnejApi;
import com.nebelriss.model.TurnejFetchResultData;
import com.nebelriss.turnej.mappers.TurnejFetchResultMapper;
import com.nebelriss.turnej.season.SeasonBo;
import com.nebelriss.turnej.season.SeasonService;
import com.nebelriss.turnej.tournament.TournamentBo;
import com.nebelriss.turnej.tournament.TournamentService;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RestController;

import java.util.Collection;

@RestController
public class TurnejController implements TurnejApi {

    private final TournamentService tournamentService;
    private final SeasonService seasonService;

    public TurnejController(TournamentService tournamentService, SeasonService seasonService) {
        this.tournamentService = tournamentService;
        this.seasonService = seasonService;
    }

    @Override
    public ResponseEntity<TurnejFetchResultData> getTurnejFetchResult() {
        Collection<TournamentBo> tournaments = tournamentService.getAllTournaments();

        Collection<SeasonBo> seasons = seasonService.getAllByTournamentId(tournaments);

        TurnejFetchResultBo bo = new TurnejFetchResultBo(
                tournaments,
                seasons
        );
        return new ResponseEntity<>(TurnejFetchResultMapper.INSTANCE.toData(bo), HttpStatus.OK);
    }
}
