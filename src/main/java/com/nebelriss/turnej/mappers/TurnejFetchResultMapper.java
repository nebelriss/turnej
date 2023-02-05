package com.nebelriss.turnej.mappers;

import com.nebelriss.model.TurnejFetchResultData;
import com.nebelriss.turnej.turnej.TurnejFetchResultBo;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper(uses = {TournamentMapper.class, SeasonMapper.class})
public interface TurnejFetchResultMapper {

    TurnejFetchResultMapper INSTANCE = Mappers.getMapper(TurnejFetchResultMapper.class);

    TurnejFetchResultData toData(TurnejFetchResultBo bo);

    TurnejFetchResultBo toBo(TurnejFetchResultData data);
}
