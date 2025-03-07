python
def login():
    username = input("Username: ")
    password = input("Password: ")
    # Add authentication logic here
    if username == "test" and password == "password":
        print("Login successful!")
    else:
        print("Login failed.")

login()
