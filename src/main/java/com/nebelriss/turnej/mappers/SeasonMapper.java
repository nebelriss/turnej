package com.nebelriss.turnej.mappers;

import com.nebelriss.model.SeasonData;
import com.nebelriss.turnej.models.Season;
import com.nebelriss.turnej.season.SeasonBo;
import org.mapstruct.Mapper;
import org.mapstruct.factory.Mappers;

@Mapper
public interface SeasonMapper {
    SeasonMapper INSTANCE = Mappers.getMapper(SeasonMapper.class);

    SeasonBo toBoFromEntity(Season season);

    Season toSeasonFromBo(SeasonBo bo);

    SeasonData toDataFromBo(SeasonBo bo);

    SeasonBo toBoFromData(SeasonData data);

}
