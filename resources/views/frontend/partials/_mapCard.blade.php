

                            

                            <div class="row">
                              <div class="form-group col-md-6">
                                    <!-- <br><br> -->
                                    <label><u>Address :</u></label><br>
                                    <label for="house" class="col-md-4 control-label">House Number :</label>
                                    <input type="text" class="form-control" name="house" id="house" placeholder="house number" value="{{ old('house') }}" pattern="[A-Za-z0-9,/\s]{1,}" title="Only characters, numericals, coma operator,/ and spaces allowed" required>
                                    <br>
                                    <label for="location" class="col-md-4 control-label">Location :</label>
                                    <input type="text" class="form-control" name="location" id="location" >
                              </div>
                              <div class="form-group col-md-6">
                                  <div id="map_canvas" class="form-control" style="height:150px"></div>
                              </div>
                            </div>