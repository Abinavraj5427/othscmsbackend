import java.util.*;
import java.io.*;
public class DryRun{

    public static void main(String[] args) throws Exception{
        Scanner scan = new Scanner(new File("dryrun.dat"));
        int lines = scan.nextInt();
        scan.nextLine();
        for(int i = 0; i< lines;i++){
            System.out.println("I like "+scan.next()+".");
        }
    }
}