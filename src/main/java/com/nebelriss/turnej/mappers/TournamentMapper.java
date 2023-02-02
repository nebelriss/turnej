package com.nebelriss.turnej.mappers;

import com.nebelriss.model.TournamentData;
import com.nebelriss.turnej.models.Tournament;
import com.nebelriss.turnej.tournament.TournamentBo;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper
public interface TournamentMapper {
    TournamentMapper INSTANCE = Mappers.getMapper(TournamentMapper.class);

    TournamentBo fromData(TournamentData data);

    Tournament toEntity(TournamentBo bo);

    TournamentBo fromEntity(Tournament tournament);
}
