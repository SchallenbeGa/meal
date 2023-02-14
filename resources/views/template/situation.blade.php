<form method="POST" class="needs-validation border-bottom pb-3 pb-lg-4" action="{{ route('update.situation') }}" novalidate>
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    @csrf
    @method('POST')
    <!-- Accordion: Alternative style -->
    <div class="accordion" id="accordionAlt">
        <!-- Item -->
        <div class="accordion-item border-0 rounded-3 shadow-sm mb-3 ">
            <h3 class="accordion-header" id="headingFour">
                <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Travail actuel</button>
            </h3>
            <div class="accordion-collapse collapse" id="collapseFour" aria-labelledby="headingFour" data-bs-parent="#accordionAlt">
                <div class="accordion-body pt-0">
                    <div class="row pb-2">
                        <h4 class="mb-3">Saisis tes informations pour la déclaration</h4>
                        <div class="col-sm-8 mb-4">
                            <div class="form-check form-switch mb-3" style="text-align:left">
                                <input type="checkbox" class="form-check-input" {{Auth::user()->is_student ?'checked="checked"':''}} name="is_student" id="is_student">
                                <label class="form-check-label" for="is_student">Je suis étudiant</label>
                            </div>
                            <div class="form-floating">

                                <input class="form-control" type="text" name="actual_job_name" id="fl-text" value="{{ Auth::user()->actual_job }}" placeholder="Intitulé du travail actuel">
                                <label for="np" class="form-label fs-base">Intitulé du travail actuel ou étude actuel</label>
                                <div class="form-text">Si tu es étudiant saisis simplement ta formation (Exemple: J'ai une formation d'employé de commerce)</div>
                            </div>

                        </div>
                        <div class="row pb-2">
                          
                        </div>
                    </div>
                </div>
            </div>

            <!-- Item -->
            <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                <h3 class="accordion-header" id="headingFive">
                    <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Section 2</button>
                </h3>
                <div class="accordion-collapse collapse" id="collapseFive" aria-labelledby="headingFive" data-bs-parent="#accordionAlt">
                    <div class="accordion-body pt-0">
                        <div class="mb-3">
                            <div class="form-floating mb-4">
                                <h4 class="mb-3">Peut etre une liste a cocher</h4>
                                <div class="form-check" style="text-align:left">
                                    <input class="form-check-input" name="know" id="inline-form-check" type="checkbox">
                                    <label class="form-check-label" for="inline-form-check">ok</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item -->
                <div class="accordion-item border-0 rounded-3 shadow-sm">
                    <h3 class="accordion-header" id="headingSix">
                        <button class="accordion-button shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Encore ?</button>
                    </h3>
                    <div class="accordion-collapse collapse" id="collapseSix" aria-labelledby="headingSix" data-bs-parent="#accordionAlt">
                        <div class="accordion-body pt-0">
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="education" id="fl-text" value="" placeholder="Intitulé du travail actuel">
                                <label for="np" class="form-label fs-base"><strong>Catégorie</strong>, exemple1, 2, 3, 4</label>
                                <div class="form-text">ok</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="text" name="skills" id="fl-text" value="" placeholder="Intitulé du travail actuel">
                                <label for="np" class="form-label fs-base"><strong>Encore un </strong></label>
                                <div class="form-text">hmmm</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="d-flex mb-3">
                <button type="submit" class="btn w-100 btn-secondary">Sauvegarder</button>
            </div>
        </div>
    </div>
</form>