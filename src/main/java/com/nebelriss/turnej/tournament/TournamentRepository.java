package com.nebelriss.turnej.tournament;

import com.nebelriss.turnej.models.Tournament;
import org.springframework.data.repository.Repository;

import java.util.List;
import java.util.UUID;

public interface TournamentRepository extends Repository<Tournament, UUID> {
    List<Tournament> findAll();
}
