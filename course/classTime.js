function showTimeOptions() {
    var c_type = document.getElementById("c_type").value;
    var c_time = document.getElementById("c_time");
    var c_day = document.getElementById("c_day");
    c_time.innerHTML = '<option selected disabled>Select Time</option>';
    c_day.innerHTML = '<option selected disabled>Select Day</option>'

    if (c_type === "Theory") {
        c_time.disabled = false;
        c_day.disabled = false;
        addTheoryTimeOptions(c_time);
        addTheoryDayOptions(c_day);
    } else if (c_type === "Lab") {
        c_time.disabled = false;
        c_day.disabled = false;
        addLabTimeOptions(c_time);
        addLabDayOptions(c_day);
    } else {
        c_time.disabled = true;
        c_day.disabled = true;
    }
}

function addTheoryTimeOptions(selectElement) {
    var theoryTimes = [
        "8:30 - 9:50",
        "9:51 - 11:10",
        "11:11 - 12:30",
        "12:31 - 1:50",
        "1:51 - 3:10",
        "3:11 - 4:30"
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
        "Sat / Tues",
        "Sun / Wed"
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
        "8:30 - 11:00",
        "11:11 - 1:40",
        "2:00 - 4:30"
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
