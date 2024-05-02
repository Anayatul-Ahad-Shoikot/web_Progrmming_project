function showTimeOptions() {
    var c_type = document.getElementById("c_type").value;
    var c_time = document.getElementById("c_time");
    var c_day1 = document.getElementById("c_day1");
    c_time.innerHTML = '<option selected disabled>Select Time</option>';
    c_day1.innerHTML = '<option selected disabled>Select Day1</option>';

    if (c_type === "Theory") {
        c_time.disabled = false;
        c_day1.disabled = false;
        addTheoryTimeOptions(c_time);
        addTheoryDayOptions(c_day1);
    } else if (c_type === "Lab") {
        c_time.disabled = false;
        c_day1.disabled = false;
        addLabTimeOptions(c_time);
        addLabDayOptions(c_day1);
    } else {
        c_time.disabled = true;
        c_day1.disabled = true;
    }
}

function addTheoryTimeOptions(selectElement) {
    var theoryTimes = [
        "8:30AM - 9:50AM",
        "9:51AM - 11:10AM",
        "11:11AM - 12:30PM",
        "12:31PM - 1:50PM",
        "1:51PM - 3:10PM",
        "3:11PM - 4:30PM"
    ];
    theoryTimes.forEach(function(time) {
        var option = document.createElement("option");
        option.value = time;
        option.text = time;
        selectElement.add(option);
    });
}

function addTheoryDayOptions(selectElement) {
    var theoryDays = [
        "Sat Tues",
        "Sun Wed",
    ];
    theoryDays.forEach(function(day) {
        var option = document.createElement("option");
        option.value = day;
        option.text = day;
        selectElement.add(option);
    });
}

function addLabTimeOptions(selectElement) {
    var labTimes = [
        "8:30AM - 11:00AM",
        "11:11AM - 1:40PM",
        "2:00PM - 4:30PM"
    ];
    labTimes.forEach(function(time) {
        var option = document.createElement("option");
        option.value = time;
        option.text = time;
        selectElement.add(option);
    });
}

function addLabDayOptions(selectElement) {
    var labDays = [
        "Sat",
        "Sun",
        "Tues",
        "Wed"
    ];
    labDays.forEach(function(day) {
        var option = document.createElement("option");
        option.value = day;
        option.text = day;
        selectElement.add(option);
    });
}
