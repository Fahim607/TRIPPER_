<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multistep form</title>
  <link rel="stylesheet" href="css/form.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <body>
        <div class="container">
            <header>Travel Checklist </header>
            <div class="progress-bar">
                <div class="step">
                    <p>Overview</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Environment</p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Activities</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Budget </p>
                    <div class="bullet">
                        <span>4</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Travelers</p>
                    <div class="bullet">
                        <span>5</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p>Location </p>
                    <div class="bullet">
                        <span>6</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>
            <div class="form-outer">
                <form action="location_suggestion.php" method="POST">
                    <div class="page slide-page">
                        <div class="title">Hi, Welcome to our Advanced Travel Recommendation System</div>
                        <p>You have to answer the upcoming 5 question to give us an idea about your likings. Based on that our system will recommend best travel locations in Bangladesh to you. <br><br>
                        <span style="display: block; text-align: center;">To start, Click "NEXT"</span></p>
                        <div class="field">
                            <button class="firstNext next">Next</button>
                        </div>
                    </div>

                    <div class="page">
                        <p>What type of climate do you prefer for your vacation?</p>
                          <div><input type="radio" id="warm" name="climate" value="Warm and humid" required>
                          <label for="warm">Warm and humid</label></div>

                          <div><input type="radio" id="Tropical" name="climate" value="Tropical" required>
                          <label for="Tropical">Tropical</label></div>

                          <div><input type="radio" id="Mild" name="climate" value="Mild and temperate" required>
                          <label for="Mild">Mild and temperate</label></div><br>

                          <div><input type="radio" id="Cool" name="climate" value="Cool and refreshing" required>
                          <label for="Cool">Cool and refreshing</label></div>
                        <div class="field btns">
                            <button class="prev-1 prev">Previous</button>
                            <button class="next-1 next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <p>What activities are you interested in during your trip?</p>
                          <div><input type="radio" id="beach" name="activity" value="Beach" required>
                          <label for="beach">Beach, water sports, seafood</label></div>
                          <div><input type="radio" id="Hiking" name="activity" value="Hiking" required>
                          <label for="Hiking">Hiking, Chander Gari, Golden Temple</label></div>
                          <div><input type="radio" id="safari" name="activity" value="Wildlife safari" required>
                          <label for="safari">Wildlife safari, mangrove forest exploration</label></div><br>
                          <div><input type="radio" id="Trekking" name="activity" value="Trekking">
                          <label for="Trekking">Trekking, indigenous culture</label></div><br>
                          <div><input type="radio" id="Boating" name="activity" value="Boating" required>
                          <label for="Boating">Boating, hill views, tribal culture</label></div>
                        <div class="field btns">
                            <button class="prev-2 prev">Previous</button>
                            <button class="next-2 next">Next</button>
                        </div>
                    </div>
                    <div class="page">
                        <p>What's your budget for this trip?</p>
                          <div><input type="radio" id="Luxury" name="budget" value="Luxury" required>
                          <label for="Luxury">Luxury experience</label></div>
                          <div><input type="radio" id="Mid-range" name="budget" value="Mid-range"required>
                          <label for="Mid-range">Mid-range</label></div>
                          <div><input type="radio" id="Budget-friendly" name="budget" value="Budget-friendly"required>
                          <label for="Budget-friendly">Budget-friendly</label></div>
                        <div class="field btns">
                            <button class="prev-3 prev">Previous</button>
                            <button class="next-3 next">Next</button>
                        </div>
                    </div>

                    <div class="page">
                        <p>How many travelers are going to have a tour together?</p>
                          <div><input type="radio" id="Solo" name="guest" value="1" required>
                          <label for="Solo"> Solo traveler (1 Person)</label></div>
                          <div><input type="radio" id="Small" name="guest" value="2" required>
                          <label for="Small">Small group (2-4 members)</label></div>
                          <div><input type="radio" id="Large" name="guest" value="4" required>
                          <label for="Large">Large group (5 or more members)</label></div>
                        <div class="field btns">
                            <button class="prev-4 prev">Previous</button>
                            <button class="next-4 next">Next</button>
                        </div>
                    </div>

                    <div class="page">
                        <p>Are you looking for a specific type of location (e.g., urban, rural, coastal, etc.)?</p>
                          <div><input type="radio" id="Urban" name="type" value="Urban" required>
                          <label for="Urban">Urban/city</label></div>
                          <div><input type="radio" id="Natural" name="type" value="Natural" required>
                          <label for="Natural">Forests/Natural</label></div><br>
                          <div><input type="radio" id="Hill" name="type" value="Hill station"required>
                          <label for="Hill">Hill station/Mountain Side</label></div>
                          <div><input type="radio" id="Coastal" name="type" value="Coastal"required>
                          <label for="Coastal">Coastal/beachside</label></div>
                        <div class="field btns">
                            <button class="prev-5 prev">Previous</button>
                            <button type="submit" name="get_suggestion" class="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/form.js"></script>
    </body>
</html>
