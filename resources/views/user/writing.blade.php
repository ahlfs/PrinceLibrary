<x-navbar></x-navbar>

<link rel="stylesheet" href="/assets/css/featured.css">

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">

                <!-- ***** Details Start ***** -->
                <div class="game-details header-text">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
                                <div class="d-flex justify-content-end">
                                    <label for="translateButton" class="switch" aria-label="Toggle Filter">
                                        <input id="translateButton" type="checkbox"/>
                                        <span>Indo</span>
                                        <span>Eng</span>
                                    </label>
                                </div>

                                <h2>{{ $data->title }}</h2>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="assets/images/details-01.jpg" alt=""
                                            style="border-radius: 23px; margin-bottom: 30px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="assets/images/details-02.jpg" alt=""
                                            style="border-radius: 23px; margin-bottom: 30px;">
                                    </div>
                                    <div class="col-lg-4">
                                        <img src="assets/images/details-03.jpg" alt=""
                                            style="border-radius: 23px; margin-bottom: 30px;">
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="indolang" id="indolang">{{ $data->content }}</p>

                                        <p class="englang" id="englang">The Dunning–Kruger effect is a cognitive bias in which people
                                            with limited competence in a particular domain overestimate their abilities.
                                            It was first described by David Dunning and Justin Kruger in 1999. Some
                                            researchers also include the opposite effect for high performers: their
                                            tendency to underestimate their skills. In popular culture, the
                                            Dunning–Kruger effect is often misunderstood as a claim about general
                                            overconfidence of people with low intelligence instead of specific
                                            overconfidence of people unskilled at a particular task.

                                            Numerous similar studies have been done. The Dunning–Kruger effect is
                                            usually measured by comparing self-assessment with objective performance.
                                            For example, participants may take a quiz and estimate their performance
                                            afterward, which is then compared to their actual results. The original
                                            study focused on logical reasoning, grammar, and social skills. Other
                                            studies have been conducted across a wide range of tasks. They include
                                            skills from fields such as business, politics, medicine, driving, aviation,
                                            spatial memory, examinations in school, and literacy.

                                            There is disagreement about the causes of the Dunning–Kruger effect.
                                            According to the metacognitive explanation, poor performers misjudge their
                                            abilities because they fail to recognize the qualitative difference between
                                            their performances and the performances of others. The statistical model
                                            explains the empirical findings as a statistical effect in combination with
                                            the general tendency to think that one is better than average. Some
                                            proponents of this view hold that the Dunning–Kruger effect is mostly a
                                            statistical artifact. The rational model holds that overly positive prior
                                            beliefs about one's skills are the source of false self-assessment. Another
                                            explanation claims that self-assessment is more difficult and error-prone
                                            for low performers because many of them have very similar skill levels.

                                            There is also disagreement about where the effect applies and about how
                                            strong it is, as well as about its practical consequences. Inaccurate
                                            self-assessment could potentially lead people to making bad decisions, such
                                            as choosing a career for which they are unfit, or engaging in dangerous
                                            behavior. It may also inhibit people from addressing their shortcomings to
                                            improve themselves. Critics argue that such an effect would have much more
                                            dire consequences than what is observed.</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***** Details End ***** -->

            </div>
        </div>
    </div>
</div>

<script>
  document.getElementById("englang").style.display = "none";
  const translateButton = document.getElementById("translateButton");
translateButton.addEventListener("change", () => {
    if (translateButton.checked) {
        document.getElementById("indolang").style.display = "none";
        document.getElementById("englang").style.display = "block";
        console.log("kuontoll");
    } else {
        document.getElementById("indolang").style.display = "block";
        document.getElementById("englang").style.display = "none";
    }
});
</script>

<x-footer></x-footer>
