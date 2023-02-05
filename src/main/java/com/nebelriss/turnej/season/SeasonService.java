package com.nebelriss.turnej.season;

import com.google.common.collect.ImmutableList;
import com.nebelriss.turnej.mappers.SeasonMapper;
import com.nebelriss.turnej.mappers.TournamentMapper;
import com.nebelriss.turnej.tournament.TournamentBo;
import org.springframework.stereotype.Service;

import java.util.Collection;

@Service
public class SeasonService {

    private final SeasonRepository repository;

    public SeasonService(SeasonRepository repository) {
        this.repository = repository;
    }

    public Collection<SeasonBo> getAllByTournamentId(Collection<TournamentBo> tournaments) {
        return repository.findByTournamentIn(tournaments.stream()
                        .map(TournamentMapper.INSTANCE::toEntityFromBo)
                        .collect(ImmutableList.toImmutableList())
                ).stream()
                .map(SeasonMapper.INSTANCE::toBoFromEntity)
                .collect(ImmutableList.toImmutableList());
    }
}
