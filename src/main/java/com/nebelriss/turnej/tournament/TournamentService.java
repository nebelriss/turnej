package com.nebelriss.turnej.tournament;

import com.google.common.collect.ImmutableList;
import com.nebelriss.turnej.mappers.TournamentMapper;
import org.springframework.stereotype.Service;

import java.util.Collection;

@Service
public class TournamentService {

    private final TournamentRepository repository;

    public TournamentService(TournamentRepository repository) {
        this.repository = repository;
    }

    public Collection<TournamentBo> getAllTournaments() {
        return repository.findAll().stream()
                .map(TournamentMapper.INSTANCE::toBoFromEntity)
                .collect(ImmutableList.toImmutableList());
    }
}
