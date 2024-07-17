jQuery(document).ready(function($) {
    $('#fitnessActivityForm').on('submit', function(e) {
        e.preventDefault();
        
        const activityType = $('#activityType').val();
        const duration = $('#duration').val();
        const distance = $('#distance').val();
        const calories = $('#calories').val();
        const date = $('#date').val();
        
        $.ajax({
            url: fitnessTracker.ajax_url,
            type: 'POST',
            data: {
                action: 'add_activity',
                activityType: activityType,
                duration: duration,
                distance: distance,
                calories: calories,
                date: date
            },
            success: function(response) {
                if (response.success) {
                    alert('Activity added successfully!');
                } else {
                    alert('An error occurred. Please try again.');
                }
            }
        });
    });
});
