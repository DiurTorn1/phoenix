import sys

def process_data(data):
    # Process the data here
    # For example, you can modify the data and send it back
    processed_data = "Processed: " + data
    return processed_data

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("No data provided.")
        sys.exit(1)

    data = sys.argv[1]
    result = process_data(data)
    print(result)