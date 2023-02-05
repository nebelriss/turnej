package com.nebelriss.turnej.mappers;

import com.nebelriss.model.TournamentData;
import com.nebelriss.turnej.models.Tournament;
import com.nebelriss.turnej.tournament.TournamentBo;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper
public interface TournamentMapper {
    TournamentMapper INSTANCE = Mappers.getMapper(TournamentMapper.class);

    TournamentBo toBoFromData(TournamentData data);

    TournamentData toDataFromBo(TournamentBo bo);

    Tournament toEntityFromBo(TournamentBo bo);

    TournamentBo toBoFromEntity(Tournament tournament);

}
