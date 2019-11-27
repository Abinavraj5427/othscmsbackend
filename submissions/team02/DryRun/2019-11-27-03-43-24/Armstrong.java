import java.io.File;
import java.util.Scanner;

public class Armstrong {
    public static void main(String[] args) throws Exception {
        Scanner sc = new Scanner(new File("armstrong.dat"));
        int N = sc.nextInt();
        for (int i = 0; i < N; i++)
        {
            String s = sc.nextLine();
            int num = Integer.parseInt(s);
            int fin = 0;
            for (int j = 0; j < s.length(); j++)
            {
                int dd = Integer.parseInt(s.substring(j, j+1));
                dd = (int)Math.pow(dd, s.length());
                fin += dd;
            }
            if (fin == num)
                System.out.println("ARMSTRONG");
            else
                System.out.println("NOT AN ARMSTRONG");
        }
    }
}