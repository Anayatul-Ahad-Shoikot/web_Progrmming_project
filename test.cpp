#include <stdio.h>
#include <stdlib.h>
#include <time.h>

// Function to swap two integers
void swap(int *a, int *b) {
    int temp = *a;
    *a = *b;
    *b = temp;
}

// Function to perform bubble sort
void bubble_sort(int arr[], int size) {
    for (int i = 0; i < size - 1; i++) {
        for (int j = 0; j < size - i - 1; j++) {
            if (arr[j] > arr[j + 1]) {
                swap(&arr[j], &arr[j + 1]);
            }
        }
    }
}

int main() {
    // Seed the random number generator with current time
    srand(time(NULL));

    // Generate 500 random integers in the range 0 to 999
    int numbers[500];
    for (int i = 0; i < 500; i++) {
        numbers[i] = rand() % 1000;
    }

    // Write the generated numbers to a file named "in.txt"
    FILE *file = fopen("in.txt", "w");
    if (file == NULL) {
        printf("Error opening file for writing.\n");
        return 1; // Return with an error code
    }

    for (int i = 0; i < 500; i++) {
        fprintf(file, "%d\n", numbers[i]);
    }

    fclose(file);

    // Sort the numbers using bubble sort
    bubble_sort(numbers, 500);

    // Print the sorted numbers
    printf("Sorted numbers:\n");
    for (int i = 0; i < 500; i++) {
        printf("%d\n", numbers[i]);
    }

    return 0; // Return with success code
}
