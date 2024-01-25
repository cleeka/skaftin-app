
                                    <div class="single mt-4">
                                           <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                              <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button newAddress" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <label class="deliveryText">Add new delivery address</label>
                                                 
                                                </button>
                                              </h2>

                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                           <form id="addressAddEditForm" action="javascript:;" method="post">@csrf
                                            <input type="hidden" name="delivery_id">
                                            <div class="row g-3">
                                                <div class="col-sm-6">
                                                    <label for="Name" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="delivery_name" name="delivery_name" placeholder="" value="" required>
                                                </div>
                                  
                                                <div class="col-sm-6">
                                                    <label for="Address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="delivery_address" name="delivery_address" placeholder="" value="" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="City" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="delivery_city" name="delivery_city" placeholder="" value="" required>
                                                </div>
                                  
                                                <div class="col-sm-6">
                                                    <label for="State" class="form-label">State</label>
                                                    <input type="text" class="form-control" id="delivery_state" name="delivery_state" placeholder="" value="" required>
                                                </div>
   
                                  
                                                <div class="col-md-5">
                                                    <label for="country" class="form-label">Country</label>
                                                    <select class="form-select" name="delivery_country" 
                                                       id="delivery_country" required>
                                                        <option value="">Select Country</option>
                                                        <option>Zimbabwe</option>
                                                        <option>South Africa</option>
                                                        <option>Zambia</option>
                                                    </select>
                                                </div>
                                  
                                                <div class="col-sm-4">
                                                    <label for="City" class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" id="delivery_mobile" name="delivery_mobile" placeholder="" value="" required>
                                                </div>
                                  
                                                <div class="col-md-3">
                                                    <label for="zip" class="form-label">Pincode</label>
                                                    <input type="text" class="form-control" id="delivery_pincode" name="delivery_pincode"placeholder="" required>
                                                </div>
                                                <button class="btn primary dark block mt-4 custom" id="btnShipping" type="submit">Save Address</button>
                                               </div>
                                                </form>
                                               </div>
                                             </div>
                                           </div>
                                         </div>


                                         <hr class="my-4">
                                             
                                            <h4 class="mb-3">Delivery Option</h4>
                                  
                                            <div class="my-3 d-flex align-items-center">
                                                <div class="column withLabel">
                                                    <input id="standard" name="deliveryMethod" type="radio" class="form-check-input" value="0" checked required>
                                                    <label class="withLabel_label" for="standard">
                                                        <div class="heading">
                                                            <h2 class="mb-0">Standard Delivery</h2>
                                                        </div>
                                                        <p>7 - 10 Business Days</p>
                                                        <small>Free</small>
                                                    </label>
                                                </div>

                                                <div class="column withLabel">
                                                    <input id="express" name="deliveryMethod" type="radio" class="form-check-input" value="250"required>
                                                    <label class="withLabel_label" for="express">
                                                        <div class="heading">
                                                            <h2 class="mb-0">Express Delivery</h2>
                                                        </div>
                                                        <p>3 - 5 Business Days</p>
                                                        <small>R250</small>
                                                    </label>
                                                </div> 
                                            </div>   
                                    </div>