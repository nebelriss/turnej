package com.nebelriss.turnej.season;

import com.nebelriss.turnej.models.Season;
import com.nebelriss.turnej.models.Tournament;
import org.springframework.data.repository.Repository;

import java.util.Collection;
import java.util.List;
import java.util.UUID;

public interface SeasonRepository extends Repository<Season, UUID> {
    List<Season> findByTournamentIn(Collection<Tournament> tournaments);
}
