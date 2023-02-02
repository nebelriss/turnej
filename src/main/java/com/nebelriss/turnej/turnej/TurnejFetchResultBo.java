package com.nebelriss.turnej.turnej;

import com.nebelriss.turnej.tournament.TournamentBo;

import java.util.Collection;

public record TurnejFetchResultBo(Collection<TournamentBo> tournaments) {
}
