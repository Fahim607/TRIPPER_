<?php

function generateTravelPackage($preferences) {
    // Dummy data for accommodation and activity options
    $accommodationOptions = ["Budget Hotel", "Standard Hotel", "Mid-range Hotel", "Business Hotel", "Adventure Lodge", "Wellness Resort"];
    $activityOptions = [
        "City Tour", "Louvre Museum Visit", "Sushi Making Class", "Sumo Wrestling Experience",
        "Beach Day", "Ubud Monkey Forest Visit", "Meetings", "Networking Events",
        "Bungee Jumping", "Hiking", "Colosseum Tour", "Vatican City Visit",
        "Yoga Retreat", "Spa Day"
    ];

    // Placeholder for the actual implementation of package generation logic
    $selectedAccommodation = $accommodationOptions[array_rand($accommodationOptions)];
    $selectedActivities = array_rand(array_flip($activityOptions), 2); // Select two random activities

    // Calculate total cost based on some arbitrary logic (replace this with your actual pricing logic)
    $totalCost = calculateTotalCost($selectedAccommodation, $selectedActivities);

    // Build the package array
    $travelPackage = [
        "destination" => $preferences["destination"],
        "accommodation" => $selectedAccommodation,
        "activities" => $selectedActivities,
        "total_cost" => $totalCost
    ];

    return $travelPackage;
}

// Placeholder function for calculating total cost (replace this with your actual pricing logic)
function calculateTotalCost($accommodation, $activities) {
    // Dummy pricing logic, replace this with actual pricing logic
    $accommodationCosts = ["Budget Hotel" => 500, "Standard Hotel" => 800, "Mid-range Hotel" => 1200, "Business Hotel" => 1500, "Adventure Lodge" => 1000, "Wellness Resort" => 1300];
    $activityCosts = ["City Tour" => 100, "Louvre Museum Visit" => 150, "Sushi Making Class" => 200, "Sumo Wrestling Experience" => 250, "Beach Day" => 50, "Ubud Monkey Forest Visit" => 80, "Meetings" => 300, "Networking Events" => 200, "Bungee Jumping" => 150, "Hiking" => 100, "Colosseum Tour" => 120, "Vatican City Visit" => 180, "Yoga Retreat" => 180, "Spa Day" => 120];

    $accommodationCost = $accommodationCosts[$accommodation];
    $activityCost = array_sum(array_intersect_key($activityCosts, array_flip($activities)));

    return $accommodationCost + $activityCost;
}

// Example usage
$preferences = [
    "destination" => "Paris",
    "budget" => 2000,
    "duration" => 7,
    // Additional preferences can be added as needed
];

$generatedPackage = generateTravelPackage($preferences);

// Output the generated package
echo "Generated Travel Package:\n";
print_r($generatedPackage);