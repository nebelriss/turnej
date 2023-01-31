package com.nebelriss.turnej;

import com.nebelriss.api.TurnejApi;
import com.nebelriss.model.LoadResultResponseData;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.RestController;

@RestController
public class TurnejController implements TurnejApi {

    @Override
    public ResponseEntity<LoadResultResponseData> getLoadResult() {
        return null;
    }
}
